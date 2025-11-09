pipeline {
    agent {
        label 'php-agent'
    }
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checking out code from repository...'
                checkout scm
            }
        }
        
        stage('Install Dependencies') {
            steps {
                echo 'Installing project dependencies with Composer...'
                sh '''
                    if [ -f "composer.json" ]; then
                        composer install --no-interaction --prefer-dist --optimize-autoloader
                        echo "Dependencies installed successfully"
                    else
                        echo "No composer.json found, skipping dependency installation"
                        exit 1
                    fi
                '''
            }
        }
        
        stage('Validate') {
            steps {
                echo 'Validating composer.json and composer.lock...'
                sh 'composer validate --strict'
            }
        }
        
        stage('Test') {
            steps {
                echo 'Running unit tests with PHPUnit...'
                sh '''
                    if [ -f "vendor/bin/phpunit" ]; then
                        vendor/bin/phpunit --testdox --colors=always
                    elif [ -f "phpunit.xml" ] || [ -f "phpunit.xml.dist" ]; then
                        phpunit --testdox --colors=always
                    else
                        echo "ERROR: No PHPUnit configuration found"
                        exit 1
                    fi
                '''
            }
        }
        
        stage('Code Quality Check') {
            steps {
                echo 'Checking code syntax...'
                sh '''
                    # Check PHP syntax in src directory
                    find src -name "*.php" -print0 | xargs -0 -n1 php -l
                    
                    # Check PHP syntax in tests directory
                    find tests -name "*.php" -print0 | xargs -0 -n1 php -l
                    
                    echo "All PHP files have valid syntax"
                '''
            }
        }
    }
    
    post {
        always {
            echo 'Pipeline execution completed.'
            echo '================================'
            // Clean workspace after build
            cleanWs()
        }
        success {
            echo '✓ All stages completed successfully!'
            echo '✓ Tests passed'
            echo '✓ Code quality checks passed'
        }
        failure {
            echo '✗ Pipeline failed!'
            echo 'Please check the console output for details.'
        }
        unstable {
            echo '⚠ Pipeline completed with warnings'
        }
    }
}