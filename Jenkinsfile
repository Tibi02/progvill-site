node('master') {
  stage('Git checkout') {
    ansiColor('xterm') {
      checkout([$class: 'GitSCM', branches: [[name: '*/master']], doGenerateSubmoduleConfigurations: false, extensions: [], submoduleCfg: [], userRemoteConfigs: [[url: 'git@bitbucket.org:oktibor/progvill.hu.git']]])
    }
  }
  
  stage('Docker pull') {
    ansiColor('xterm') {
      sh('docker-compose pull')
    }
  }
  
  stage('Recreate container') {
    ansiColor('xterm') {
      withEnv(['MYSQL_PORT=3306', 'MYSQL_HOST=mysql', 'MYSQL_DB=progvill', 'MYSQL_DB_PREFIX=progvill_']) {
        withCredentials([usernamePassword(credentialsId: 'mysql', passwordVariable: 'MYSQL_PASSWORD', usernameVariable: 'MYSQL_USER')]) {
          sh('docker-compose up -d --force-recreate')
        }
      }
    }
  }
}
