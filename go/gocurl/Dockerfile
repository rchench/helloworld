# this is to build the image
FROM golang:alpine as build

WORKDIR /go/src/gocurl
ADD . .

RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo .

CMD ["./gocurl"]

# this is to publish the image
FROM scratch AS prod

COPY --from=build /go/src/gocurl/gocurl .
CMD ["./gocurl"]
