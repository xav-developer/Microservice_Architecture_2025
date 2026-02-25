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

# K8S

## Build

### Authorization

```shell
make build-authorization
```

### Profile

```shell
make build-profile
```

## Push

### Authorization

```shell
make push-authorization
```

### Profile

```shell
make push-profile
```

# Helm

## Infrastructure

```shell
helm upgrade \
  --install \
  --create-namespace \
  --namespace fa \
  infrastructure k8s/helm/infrastructure
```

## ConfigMap

```shell
kubectl apply \
  --namespace fa \
  --filename k8s/configmap.yaml
```

## Secret

```shell
kubectl apply \
  --namespace fa \
  --filename k8s/secret.yaml
```

## Application

### Authorization

```shell
helm upgrade \
  --install \
  --create-namespace \
  --namespace fa \
  authorization k8s/helm/authorization
```

### Profile

```shell
helm upgrade \
  --install \
  --create-namespace \
  --namespace fa \
  profile k8s/helm/profile
```

### Ingress

```shell
kubectl apply \
  --namespace fa \
  --filename k8s/fa.yaml
```

# Helm uninstall

```shell
helm uninstall \
  --namespace fa \
  authorization \
  profile \
  infrastructure
```

```shell
kubectl delete ns fa
```
