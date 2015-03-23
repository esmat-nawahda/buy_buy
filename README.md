# buy_buy
Add existing project to Github
So, you have been working on a project locally and then decide you really should version control it and share it with the world. One option would be to create the repository on Github, clone it locally and then copy all the files across. But it does not have to be so messy. Here is how you add an existing project to Github without cloning it first.

Create git repo locally
We need to add a repository for your project. Git is a distributed version control system, so each machine has its own repository. This is different to centralised version control systems like Subversion, which have a single, central, repository.

Go to your project

$ cd my_project
Initialise the repository

$ git init
You should see the following message:

Initialized empty Git repository in /path/to/my_project/.git/
Add all your files to the repo:

$ git add *
Check to see that there are changes to be committed:

$ git status
You should see something like this:

# On branch master
#
# Initial commit
#
# Changes to be committed:
#   (use "git rm --cached <file>..." to unstage)
#
#   new file:   my_project.info
#   new file:   my_project.module
#
In this case, my_project.info and my_project.module are the files I have in my project.

Commit the files.

$ git commit -m "First commit"
You should see something like this:

[master (root-commit) 8201309] First commit
 2 files changed, 74 insertions(+), 0 deletions(-)
 create mode 100644 my_project.info
 create mode 100644 my_project.module
