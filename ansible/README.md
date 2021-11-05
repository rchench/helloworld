## inventory file

```
# example of inventory file
[webservers]
10.0.0.91
10.0.0.92

[dbservers]
10.0.0.93

# default inventory file
/etc/ansible/hosts

# specify inventory file
ansible -i ./hosts

# specify ips directly without inventory file
ansible all -i ip1,ip2,

# default is all hosts
ansible all

# can specify by group or host
ansible webservers -i hosts
ansible host -i hosts
```

## ansible config
```
vi /etc/ansible/ansible.cfg

[defaults]
# ignore key check
host_key_checking = False
```

```
# ad-hoc command
ansible all -i hosts -u ubuntu -m ping
ansible all -i hosts -u ubuntu -m setup
ansible webserver -i hosts -u sre -m apt -a "name=apache state=present" -b

--ask-pass if need password
--ask-become-pass if need sudo password

# playbook
ansible-playbook webserver -i hosts install.yml

# role
```

```
Playbooks
	Plays
		Tasks
			Modules
	Handlers
```

## Python3
```
$ sudo yum install python3
$ sudo pip3 install ansible
$ sudo pip3 install jmespath
$ ansible --version | grep "python version"
  python version = 3.6.2 (default, Sep 22 2017, 08:28:09) [GCC 7.2.1 20170915 (Red Hat 7.2.1-2)]
$ vi ansible.cfg
ansible_python_interpreter=/usr/bin/python3
```

## examples
```
# create userid with passwordless sudo permission (ubuntu)
ansible-playbook addsudo.yml --become --become-method='sudo' --ask-pass --ask-become-pass

# create userid with passwordless sudo permission (centos)
ansible-playbook addwheel.yml --become --become-method='sudo' --ask-pass --ask-become-pass

# setup password for userid
ansible-playbook update_pass.yml --become --become-method='sudo' --ask-pass --ask-become-pass
```
