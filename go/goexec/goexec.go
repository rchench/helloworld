package main

import (
	"fmt"
	"log"
	"net/http"
	"os/exec"
)

func main() {

	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		w.Header().Set("Access-Control-Allow-Origin", "*")

		keys := r.URL.Query()
		ip := keys.Get("ip")

		log.Printf("[request url] %s\n", r.URL)

		cmd := exec.Command("/usr/bin/ssh", "-i", "/home/rchench/.ssh//id_rsa", "-F", "/home/rchench/.ssh/config", "-tq", "rchench@"+ip, "sudo", "crictl" ,"info", "|", "grep", "status", "|", "grep", "-v", "{")

		output, err := cmd.Output()
		if err != nil {
			panic(err)
		}

		fmt.Fprintf(w, "%s", string(output))

	})

	log.Fatal(http.ListenAndServe(":8100", nil))
}
