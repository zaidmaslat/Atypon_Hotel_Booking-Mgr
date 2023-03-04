#!/bin/bash

version=$(date +'%Y-%b-%d')-$(git rev-parse --short HEAD)


docker build -t gcr.io/hotel-booking-378919/hm-mgr:${version} .
