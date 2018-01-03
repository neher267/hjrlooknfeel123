
"Sentinel::register([
    'email'    => 'test@example.com',
    'password' => 'foobar',
]);
Sentinel::authenticate($credentials);
    
//..Authorization
Sentinel::check()

if (Sentinel::guest())
{
    // User is not logged in
}

$user = Sentinel::registerAndActivate($credentials);

//--
$user = Sentinel::findById(1);

Sentinel::login($user);

//--
Destroy the current logged in user session
$user = Sentinel::findUserById(1);

Sentinel::logout($user);

Destroy all sessions for the given user
$user = Sentinel::findUserById(1);
Sentinel::logout($user, true);
//...
$credentials = [
    'login' => 'john.doe@example.com',
];
$user = Sentinel::findByCredentials($credentials);
//..
$user = Sentinel::findByPersistenceCode('persistence_code_here');
//..
This is useful when you want to verify if the current user password matches the given password.
$credentials = [
    'email'    => 'john.doe@example.com',
    'password' => 'password',
];
$user = Sentinel::findUserById(1);
$user = Sentinel::validateCredentials($user, $credentials);
//..
$credentials = [
    'email'    => 'john.doe@example.com',
    'password' => 'password',
];
$user = Sentinel::create($credentials);
//..
$user = Sentinel::findById(1);
$credentials = [
    'email' => 'new.john.doe@example.com',
];
$user = Sentinel::update($user, $credentials);
//..
$user = Sentinel::findById(1);
$user->delete();
//..
Finds a role by its ID.
$role = Sentinel::findRoleById(1);
//.
$role = Sentinel::findRoleBySlug('admin');
//..
$role = Sentinel::findRoleByName('Admin');
//..
Assign a user to a role.
$user = Sentinel::findById(1);
$role = Sentinel::findRoleByName('Subscribers');
$role->users()->attach($user);
//..
Remove a user from a role.
$user = Sentinel::findById(1);
$role = Sentinel::findRoleByName('Subscribers');
$role->users()->detach($user);
//..
$user = Sentinel::findById(1);
$user->permissions = [
    'user.create' => true,
    'user.delete' => false,
];
$user->save();
//..
$role = Sentinel::findRoleById(1);
$role->permissions = [
    'user.update' => true,
    'user.view' => true,
];
$role->save();
//..
$user = Sentinel::findById(1);
$user->addPermission('user.create');
$user->addPermission('user.update', false);
$user->save();
//..
$user = Sentinel::findById(1);
$user->removePermission('user.delete')->save();
//..
$role = Sentinel::findRoleById(1);
$role->updatePermission('user.create');
$role->updatePermission('user.update', false, true)->save();//passing true as a third argument will create the permission if it does not already exist.
//..
$user = Sentinel::findById(1);
if ($user->hasAccess(['user.create', 'user.update'])){}
else{}
//..
if (Sentinel::hasAnyAccess(['user.admin', 'user.update']))
else
//.
$user = Sentinel::findById(1);
if ($user->hasAccess('user.*'))//Permissions can be checked based on wildcards using the * character to match any of a set of permissions.
else
//..
$user = Sentinel::findById(1);
$activation = Activation::create($user);
//..
$user = Sentinel::findById(1);
if (Activation::complete($user, 'activation_code_here')){}
else{}
//..
$user = Sentinel::findById(1);
if ($activation = Activation::completed($user))
else
//..
    $user = Sentinel::findById(1);
Activation::remove($user);
//..
Activation::removeExpired();//Removes all the expired activations."
