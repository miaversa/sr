# What is sr
sr is a servless renderer using PHP + twig renderer

-	**About PHP**:
	[the oficial PHP website](https://secure.php.net/)
	[the Docker repository](https://hub.docker.com/_/php/)
-	**About Twig**:
	[the oficial Twig website](https://twig.symfony.com/)
	[twig on Packagist](https://packagist.org/packages/twig/twig)

# How to use this image.

## Create a `Dockerfile` in your project
```dockerfile
FROM miaversa/sr
COPY . /templates
```

Create your templates using the twig syntax inside the project directory. Then, run the commands to build and run the Docker image:

```console
$ docker build -t my-sr .
$ docker run -it --rm --name my-running-sr my-sr
```

## Without a `Dockerfile`

If you don't want to include a `Dockerfile` in your project, it is sufficient to do the following:

```console
$ docker run -d -p 80:80 --name my-running-sr -v "$PWD":/templates miaversa/sr
```

# Using the running instance
```console
$ curl -v 'http://localhost:80/?template=hello.html' -H 'content-type: application/json' --data-binary '{"name":"jhon"}'
```

