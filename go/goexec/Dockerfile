# this is to build the image
FROM golang:alpine as build

RUN apk update && apk add openssh-client

WORKDIR /go/src/goexec
ADD . .
ADD ~/.ssh/id_rsa .
ADD ~/.ssh/config .
RUN chmod 700 ./id_rsa ./config

RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo .

CMD ["./goexec"]

# this is to publish the image
FROM scratch AS prod

COPY --from=build /go/src/goexec/goexec .
COPY --from=build ~/.ssh/id_rsa.daemon /home/rchench/.ssh/
COPY --from=build ~/.ssh/config /home/rchench/.ssh/
COPY --from=build /usr/bin/ssh /usr/bin/ssh

CMD ["./goexec"]
