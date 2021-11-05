# Helm

The helm install command can install from several sources:
* A chart repository (as we've seen above)
* A local chart archive (helm install foo foo-0.1.1.tgz)
* An unpacked chart directory (helm install foo path/to/foo)
* A full URL (helm install foo https://example.com/charts/foo-1.2.3.tgz)

## Use Helm

```
$ helm search hub wordpress -o yaml
Navigate to the URL via browser to get the repo link
$ helm repo add bitnami https://charts.bitnami.com/bitnami
$ helm repo update
$ helm install my-release bitnami/wordpress
$ helm install -f values.yaml bitnami/wordpress --generate-name
$ helm install --set a=b
$ helm upgrade
$ helm rollback
$ helm uninstall

$ helm create
$ helm lint
$ helm package
```

examples
```
$ helm create rick-chart
Creating rick-chart

$ helm lint rick-chart
==> Linting rick-chart
[INFO] Chart.yaml: icon is recommended

1 chart(s) linted, 0 chart(s) failed

$ helm package rick-chart
Successfully packaged chart and saved it to: /Users/eacehij/rick-chart-0.1.0.tgz
```

Helm config in MacOS: /Users/eacehij/Library/Preferences/helm

## Helm Charts

```
$ helm pull chartrepo/chartname

wordpress/
  Chart.yaml          # A YAML file containing information about the chart
  LICENSE             # OPTIONAL: A plain text file containing the license for the chart
  README.md           # OPTIONAL: A human-readable README file
  values.yaml         # The default configuration values for this chart
  values.schema.json  # OPTIONAL: A JSON Schema for imposing a structure on the values.yaml file
  charts/             # A directory containing any charts upon which this chart depends.
  crds/               # Custom Resource Definitions
  templates/          # A directory of templates that, when combined with values,
                      # will generate valid Kubernetes manifest files.
  templates/NOTES.txt # OPTIONAL: A plain text file containing short usage notes
```

Chart.yaml
```
apiVersion: The chart API version (required)
name: The name of the chart (required)
version: A SemVer 2 version (required)
kubeVersion: A SemVer range of compatible Kubernetes versions (optional)
description: A single-sentence description of this project (optional)
type: The type of the chart (optional)
keywords:
  - A list of keywords about this project (optional)
home: The URL of this projects home page (optional)
sources:
  - A list of URLs to source code for this project (optional)
dependencies: # A list of the chart requirements (optional)
  - name: The name of the chart (nginx)
    version: The version of the chart ("1.2.3")
    repository: (optional) The repository URL ("https://example.com/charts") or alias ("@repo-name")
    condition: (optional) A yaml path that resolves to a boolean, used for enabling/disabling charts (e.g. subchart1.enabled )
    tags: # (optional)
      - Tags can be used to group charts for enabling/disabling together
    import-values: # (optional)
      - ImportValues holds the mapping of source values to parent key to be imported. Each item can be a string or pair of child/parent sublist items.
    alias: (optional) Alias to be used for the chart. Useful when you have to add the same chart multiple times
maintainers: # (optional)
  - name: The maintainers name (required for each maintainer)
    email: The maintainers email (optional for each maintainer)
    url: A URL for the maintainer (optional for each maintainer)
icon: A URL to an SVG or PNG image to be used as an icon (optional).
appVersion: The version of the app that this contains (optional). Needn't be SemVer. Quotes recommended.
deprecated: Whether this chart is deprecated (optional, boolean)
annotations:
  example: A list of annotations keyed by name (optional).
```

When Helm installs/upgrades charts, the Kubernetes objects from the charts and all its dependencies are
- aggregated into a single set; then
- sorted by type followed by name; and then
- created/updated in that order.

Hence a single release is created with all the objects for the chart and its dependencies.

CRDs will be created first, upon which readiness the other resources will be created.
- CRDs cannot be templated
- CRDs are never reinstalled
- CRDs are never installed in upgrade or rollback
- CRDs are never deleted

The CRDs upgrade / deletion must be handled manually.

```
$ helm create
$ helm lint
$ helm package

$ helm create --starter
$XDG_DATA_HOME/helm/starters
```

## Chart Repository

https://artifacthub.io/

https://chartmuseum.com/

A chart repository consists of packaged charts and a special file called index.yaml which contains an index of all of the charts in the repository. Frequently, the charts that index.yaml describes are also hosted on the same server, as are the provenance files.

For example, the layout of the repository https://example.com/charts might look like this:
```
charts/
  |
  |- index.yaml
  |
  |- alpine-0.1.2.tgz
  |
  |- alpine-0.1.2.tgz.prov
```
In this case, the index file would contain information about one chart, the Alpine chart, and provide the download URL https://example.com/charts/alpine-0.1.2.tgz for that chart.

It is not required that a chart package be located on the same server as the index.yaml file. However, doing so is often the easiest.

```
$ helm package docs/examples/alpine/
$ mkdir fantastic-charts
$ mv alpine-0.1.0.tgz fantastic-charts/
$ helm repo index fantastic-charts --url https://fantastic-charts.storage.googleapis.com
```

## Chart Hooks

Just a template yaml with hook annotations: pre/post-install/delete/upgrade/rollback/test

```
annotations:
  "helm.sh/hook": post-install,post-upgrade
  "helm.sh/hook-weight": "5"
  "helm.sh/hook-delete-policy": hook-succeeded
```

The resources that a hook creates are currently not tracked or managed as part of the release.

## Library Charts

```
$ helm create mychart
$ rm -rf mychart/templates/*
$ rm -f mylibchart/values.yaml 

vi mycahrt/Chart.yaml
type: library
```

## Things to define

* os packages
* container images
* release binaries
* helm charts
* source code / yaml / json files

