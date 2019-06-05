# vbFaker
Creates fake data in a vBulletin 5 installation. In order to do this, it utilizes the vBulletin API.

## Installing

[Composer](https://getcomposer.org/) is required for this project.

To install:

1. Install Composer.
1. Install vBulletin 5 into a web accessible directory.
1. Download this repository to your local drive. It expects to be in a subdirectory of vBulletin's /core/ directory.
1. From the command line change to the vbFaker directory.
1. Run `composer update`.

## Tasks

Each task is its own file within the vbFaker directory. Please read the comments at the top of the file for additional instructions required for each task.

- createUsers.php: Creates a random number of users between specified min and max values. These users have:
  - username - combination of first name and last name from several locales. (Can contain UTF-8)
  - email addresses - firstname.lastname@domain.com (UTF-8 characters are stripped via iconv)
  - randomized passwords
  - random IP addresses.
- createPosts.php: Creates a random number of topics and replies in Forum Channels from a specified list.
  - Each Topic starter has a random length of Lorem Ipsum text.
  - Each Topic will have a random number of replies between 0 and 100.
  - Each Reply will reference the Topic ID and have a random length of Lorem Ipsum text.

## Coming Soon

- The ability to create topics with other content types.
- Create posts with different users. Currently all posts are created by user id #1
- The ability to randomly place users in different usergroups. Currently they are all located in the registered usergroup.

## Reference Database

A reference database containing over 30,000 users and over 2 Million Posts created with vbFaker can be found at [GitHub]()

---

## License

vbFaker is licensed under the MIT License.

A valid vBulletin license is required to use vbFaker. This can be obtained at [vBulletin.com](https://www.vbulletin.com)
