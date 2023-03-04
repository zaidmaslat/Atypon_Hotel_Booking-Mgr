pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                sh "echo checking out"
            }
        }

        stage('Build docker image') {
            steps {
                sh "./build.sh"
            }
        }

        stage('Push docker image') {
            steps {
                sh "./push-image.sh"
            }
        }
        stage('Deploy docker image') {
            steps {
                sh "./deploy.sh"
            }
        }                
        stage('Cleanup') {
            steps {
                sh "./cleanup.sh"
            }
        }
    }
}