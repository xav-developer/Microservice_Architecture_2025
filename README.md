# Configure

```shell
cp .env.dist .env
```

# Build

```shell
docker compose build
```

# Up

```shell
docker compose up -d
```

# Down

```shell
docker compose down
```

# Build

```shell
docker build . --platform=linux/amd64 --tag=msa:latest
```

```shell
docker build . --platform=linux/arm64 --tag=msa:latest
```

# K8S

```shell
curl http://arch.homework/health
```

```shell
newman run msa.json
```

```shell
kubectl apply -f msa.yaml
```

```shell
kubectl delete -f msa.yaml
```
