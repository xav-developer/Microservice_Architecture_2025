build-authorization:
	docker build application/authorization --platform=linux/amd64 --tag phexel/authorization:latest

build-profile:
	docker build application/profile --platform=linux/amd64 --tag phexel/profile:latest

push-authorization:
	docker push phexel/authorization:latest

push-profile:
	docker push phexel/profile:latest
