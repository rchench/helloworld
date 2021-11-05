This app is to do k8s health check via APIs

```
# edit source file
vi gocurl.go

# go build for local debug
go build .
./gocurl
curl http://localhost:8080/?...

# build docker image
docker build -t gocurl .
docker tag gocurl:latest rchench/gocurl:<version>
docker login
docker push rchench/gocurl:<version>

# deploy to kubernetes
vi deployment.yml
kubectl apply -f deployment.yml
```
