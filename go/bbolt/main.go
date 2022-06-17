package main

import (
	"log"
	"fmt"
	"encoding/json"
	"time"
	bolt "go.etcd.io/bbolt"
)

type Post struct {
	Created time.Time
	Title   string
	Content string
}

func main() {
	// Open the my.db data file in your current directory.
	// It will be created if it doesn't exist.
	db, err := bolt.Open("my.db", 0600, nil)
	if err != nil {
		log.Fatal(err)
	}

	post := &Post{
		reated: time.Now(),
		itle:   "My first post",
		ontent: "Hello, this is my first post.",
	}

	db.Update(func(tx *bolt.Tx) error {
		b, err := tx.CreateBucketIfNotExists([]byte("posts"))
		if err != nil {
			return err
		}
		//b.Put([]byte("2021-12-25"), []byte("My Christmas post"))

		encoded, err := json.Marshal(post)
		if err != nil {
			return err
		}
		return b.Put([]byte(post.Created.Format(time.RFC3339)), encoded)

	})

	db.View(func(tx *bolt.Tx) error {
		b := tx.Bucket([]byte("posts"))
		fmt.Printf("%s\n", b.Get([]byte("2015-01-01")))
		fmt.Printf("%s\n", b.Get([]byte("2021-12-25")))
		return nil
	})

	defer db.Close()
}
