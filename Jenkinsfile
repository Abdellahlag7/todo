pipeline {
    agent any

    stages {
        stage('Build and Test') {
            steps {
                sh 'composer install' 
                sh 'phpunit tests/'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    docker.build('todolist') 
                }
            }
        }
        stage('Run Container') {
            steps {
                script {
                    docker.image('todolist').run('-d -p 8080:80') // Démarrage du conteneur sur le port 8080
                }
            }
        }
    }
}
