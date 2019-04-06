<?php
/*
 * Creates a random number of users and inserts them into the selected
 * database. Users include first name, last name, email address, password,
 * and an IP address.
 * 
 * Example User: 
 * "Cassandre Wisozk"	"cassandre.wisozk@yahoo.com"	"46.172.244.164"
 * 
 * Note: Users if verify email is turned on for registration, users will be placed in 
 * Users Awaiting Email Confirmation. You will need to manually move them.
 */

################# Set Variables ############################
// How many users? 
$limits = [
	'min' => 1,
	'max' => 5,
];


################# START SCRIPT ############################

function buildUser($switchLocale=false)
{
	$locales = ['en_US','en_GB','fr_CA','es_ES','vi_VN','en_US','en_US','en_US','en_US','en_US','en_US','en_US','en_US','en_US','en_US','en_US','en_US',];

	$newUser = [];	
	$percentage=0;

	$locale = 'en_US';

	if ($switchLocale) 
	{
		$key=array_rand($locales);
		$locale = $locales[$key];
	}

	// Init Faker
	$faker = Faker\Factory::create($locale);

	$newUser['username'] = $faker->firstname . ' ' . $faker->lastname;
	
	// encourage a mix of free email providers and random domains.
	$percentage = mt_rand (1,100);
	$emailType = $percentage < 60 ? 'freeEmailDomain' : 'domainName';
	$newUser['email'] = strtolower(str_replace([' ', '\''],['.',''],$newUser['username']) . '@' . $faker->$emailType);
	
//	$percentage = mt_rand (1,100);
//	$ipType = $percentage < 85 ? 'ipv4' : 'ipv6';
//	$user['ipaddress'] = $faker->$ipType;
	$newUser['ipaddress'] = $faker->ipv4;

	return $newUser;
}

function getPassword()
{
	// Init Faker
	$faker = Faker\Factory::create('en_US');

	return $faker->password;
}
// require the autoloader to start Faker
require_once __DIR__ . '/vendor/autoload.php';


//init the vBulletin system
require_once('../vb/vb.php');
vB::init();

vB::setRequest(new vB_Request_Test(
	array(
		'userid' => 1,
		'ipAddress' => '127.0.0.1',
		'altIp' => '127.0.0.1',
		'userAgent' => 'CLI'
	)
));

vB::getRequest()->createSession();
vB::getCurrentSession()->fetchCpsessionHash();


$maxUsers= mt_rand ($limits['min'], $limits['max']);

$userApi = vB_Api::instance('user');
echo 'Attempting to create ' . $maxUsers . ' Users.' . "\n";
sleep(2);

$count = 0;
while ($count++ < $maxUsers);
{
	$user = buildUser(true);
	
	echo 'Creating user ' . $user['username'] . " (" . $user['email'] . ")\n";
	try 
	{
		$userId = $userApi->save(0, getPassword(), $user, array(), array(), array());
	} 	
	catch (vB_Exception_Database $e)
	{
		echo "Hit an exception: " . $e->getMessage() . "\n";
	}
	catch (Exception $e)
	{
		echo "Hit an exception: " . $e->getMessage() . "\n";
	}
}

echo "Completed \n";