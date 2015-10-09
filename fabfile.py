from fabric.api import *
from fabric_aws import *

env.user='ubuntu'
env.key_filename = ['key.pem'];

@autoscaling_group('us-east-1', 'maxime-asg')
@task
def deploy():
    sudo("cd /var/www/html/TestCrawler && git pull")
    sudo("composer install")
