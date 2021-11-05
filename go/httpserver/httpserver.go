package main

import (
    "fmt"
	"log"
    "net/http"
)

func main() {
    http.HandleFunc("/", func (w http.ResponseWriter, r *http.Request) {
        fmt.Fprintf(w, "Welcome to my website!")
    })

    fs := http.FileServer(http.Dir("/www/"))
    http.Handle("/www/", http.StripPrefix("/www/", fs))

    log.Fatal(http.ListenAndServe(":8080", nil))
}
