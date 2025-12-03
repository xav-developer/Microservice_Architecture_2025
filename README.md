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
