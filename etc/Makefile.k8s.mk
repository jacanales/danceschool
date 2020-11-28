########################################################################################################################
# Kubernetes & Docker
########################################################################################################################
k8s-up:
	kubectl create -f infra/k8s/namespace.yaml || echo 'Already exists'
	kubectl config set-context danceschool --namespace=danceschool \
		--cluster=docker-desktop \
		--user=docker-desktop
	kubectl config use-context danceschool

k8s-down:
	kubectl delete namespace danceschool
.PHONY: k8s-up k8s-down
