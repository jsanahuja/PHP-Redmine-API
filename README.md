# Redmine-PHP-API
A redmine php api using sql queries.
## Including
```
require_once("redmine/autoload.php");
$mysqli = new \mysqli("localhost", "username", "password", "db");
$redmine = new \Jsanahuja\Redmine\Redmine($mysqli);
```

## Projects
```
$projects = $redmine->projects->all();
$projects = $redmine->projects->all([
    ['id', "IN", [13,21]]
]);
$projects = $redmine->projects->get(79);
```
## Contacts
```
$contacts = $redmine->contacts->all();
$contacts = $redmine->contacts->get(98);
```
## Custom fields
```
$custom_fields = $redmine->custom_fields->all([
    ['type', '=', 'EasyContactCustomField']
]);
$custom_fields = $redmine->custom_fields->get(1);
```
## Custom values
```
$custom_values = $redmine->custom_values->all([], 0, 100);
$custom_values = $redmine->custom_values->all([
	['customized_type', '=', 'Project'],
	['customized_id', '=', '79']
]);
```
## Issues
```
$issues = $redmine->issues->all([], 0, 100);
$issues = $redmine->issues->all([
	['project_id', '=', '79']
]);
$estimated_hours = array_sum(array_column(
	$issues = $redmine->issues->all([
		['project_id', '=', '79']
	]), 
	'estimated_hours')
);
```
## Time Entries
```
$time_entries = $redmine->time_entries->all([], 0, 100);
$time_entries = $redmine->time_entries->all([
	['project_id', '=', '79']
]);
$spent_hours = array_sum(array_column(
	$time_entries = $redmine->time_entries->all([
		['project_id', '=', '79']
	]),
	'hours')
);
```