package main

import (
    "fmt"
    "os"
    "os/exec"
)

func main() {
    path, err := exec.LookPath("kubectl")
    if err != nil {
        fmt.Println(err, "")
        os.Exit(1)
    }
    fmt.Printf("%v\n", path)
}
