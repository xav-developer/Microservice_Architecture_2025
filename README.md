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
docker build . --platform=linux/amd64 --tag=phexel/msa:latest
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

# Helm install

# Infrastructure

```shell
helm install health-infrastructure k8s/helm/infrastructure
```

# Application

## Secret

```shell
kubectl apply -f k8s/secret.yaml
```

## Application

```shell
helm install health-application k8s/helm/application
```

# newman

```shell
newman run crud.json
```

# Helm uninstall

```shell
helm uninstall health-application health-infrastructure
```
