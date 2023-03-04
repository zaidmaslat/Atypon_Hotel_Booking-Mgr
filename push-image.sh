#!/bin/bash

version=$(date +'%Y-%b-%d')-$(git rev-parse --short HEAD)


docker push gcr.io/hotel-booking-378919/hm-mgr:${version} 


#update values in helm-charts

sed -i "s/phpImageVersionTag: .*/phpImageVersionTag: \"${version}\"/" ./helm_chart/values.yaml