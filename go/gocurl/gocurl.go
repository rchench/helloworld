package main

import (
	"fmt"
	"log"
	"net/http"
	"io/ioutil"
	"crypto/tls"
	"time"
	"encoding/json"
)

func main() {

	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		w.Header().Set("Access-Control-Allow-Origin", "*")

		keys := r.URL.Query()
		ip := keys.Get("ip")
		role := keys.Get("role")
		app := keys.Get("app")
		cluster := keys.Get("cluster")
		url := ""
		client := &http.Client{}

		switch app {
		case "apiserver":
			if role == "vip" {
				url = "https://"+ip+":6443/healthz"
			} else {
				url = "https://"+ip+":60443/healthz"
			}
		case "etcd":
			url = "https://"+ip+":2379/health"
		case "kube-proxy":
			url = "http://"+ip+":10249/healthz"
		case "kubelet":
			url = "https://"+ip+":10250/healthz"
		case "scheduler":
			url = "http://"+ip+":10251/healthz"
		case "controller-manager":
			url = "http://"+ip+":10252/healthz"
		case "docker":
			url = "http://"+ip+":9323/metrics"
		case "rancher":
			url = "https://"+ip+"/v3/clusters/?name="+cluster
		}

		log.Printf("[request url] %s\n", r.URL)

		if url != "" {
			log.Printf("[health check url] %s\n", url)

			if app == "kubelet" {
				cert, err := tls.LoadX509KeyPair("/infra/sre/.cer/"+cluster+"/apiserver-kubelet-client.crt", "/infra/sre/.cer/"+cluster+"/apiserver-kubelet-client.key")
				if err != nil {
					log.Printf("LoadX509KeyPair:", err)
				}
				client = &http.Client{
					Timeout: 3 * time.Second,
					Transport: &http.Transport{
						TLSClientConfig: &tls.Config{
							InsecureSkipVerify: true,
							Certificates: []tls.Certificate{cert},
						},
					},
				}
			} else {
				client = &http.Client{
					Timeout: 3 * time.Second,
					Transport: &http.Transport{
						TLSClientConfig: &tls.Config{
							InsecureSkipVerify: true,
						},
					},
				}
			}

			if app == "rancher" {
				bearer := "Bearer token-2d4tf:8njzfn79652swvv9wxjl9ch72brnd7p5chw5qdwf7dttx4ckk844r8"
				req, err := http.NewRequest("GET", url, nil)
				req.Header.Add("Authorization", bearer)
				resp, err := client.Do(req)
				if err != nil {
					log.Println(err)
				}

				defer resp.Body.Close()
				body, _ := ioutil.ReadAll(resp.Body)
				var dat map[string]interface{}
				byt := []byte(string(body))
				if err := json.Unmarshal(byt, &dat); err != nil {
					log.Println(err)
				}
				state := dat["data"].([]interface{})[0].(map[string]interface{})["state"].(string)
				fmt.Fprintf(w, "%s", state)
			} else {
				resp, err := client.Get(url)
				if err != nil {
					log.Println(err)
				}

				defer resp.Body.Close()
				body, _ := ioutil.ReadAll(resp.Body)
				fmt.Fprintf(w, "%s", string(body))
			}
		}

	})

	log.Fatal(http.ListenAndServe(":8080", nil))
}
