&lt;?php

$name = $_POST[&#39;name&#39;];
$designation = $_POST[&#39;designation&#39;];
$institution = $_POST[&#39;institution&#39;];
$college = $_POST[&#39;college&#39;];
$contact = $_POST[&#39;contact&#39;];
$email = $_POST[&#39;email&#39;];
$date = $_POST[&#39;date&#39;];
$session = $_POST[&#39;session&#39;];
$sem = $_POST[&quot;sem&quot;];
$date_formatted = date(&#39;Y-m-d&#39;, strtotime($date));


$servername = &quot;localhost&quot;;
$username = &quot;root&quot;;
$password = &quot;&quot;;
$dbname = &quot;claim&quot;;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die(&quot;Connection failed: &quot; . mysqli_connect_error());
} else {
$stmt = $conn-&gt;prepare(&quot;INSERT INTO claim(name, designation, institution, college, contact,
email, date, session, sem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)&quot;);
$stmt-&gt;bind_param(&quot;ssssissss&quot;, $name, $designation, $institution, $college, $contact, $email,
$date_formatted, $session, $sem);

$execval = $stmt-&gt;execute();
echo $execval;

$stmt-&gt;close();

$sql = &quot;SELECT * FROM claim WHERE name = ?&quot;;
$stmt = $conn-&gt;prepare($sql);
$stmt-&gt;bind_param(&quot;s&quot;, $name);
$stmt-&gt;execute();
$result = $stmt-&gt;get_result();
if ($result-&gt;num_rows&gt; 0) {
// Output the data
while ($row = $result-&gt;fetch_assoc()) {
if($college == &#39;K.Ramakrishna College of Engineering&#39;) {
$amount = 250;
} else {
$amount = 500;
}
if ($session == &quot;morning&quot; || $session == &quot;afternoon&quot;) {
$price = $amount+500;
} else if ($session == &quot;both&quot;) {
$price = ($amount*2)+500;
}
echo &#39;&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;----Confidential----&lt;/title&gt;
&lt;meta charset=&quot;UTF-8&quot;&gt;
&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot;href=&quot;1818.css&quot;&gt;
&lt;/head&gt;
&lt;body style=&quot;width: 793.7007874px; height: 1122.519685px;&quot;&gt;
&lt;center&gt;

&lt;div class=&quot;header&quot;&gt;
&lt;img src=&quot;https://pbs.twimg.com/profile_images/1367784253228867589/7JZXLYiJ_400x400.jpg&quot;
alt=&quot;Logo&quot; class=&quot;logo&quot;&gt;
&lt;div class=&quot;heading&quot;&gt;
&lt;center&gt;&lt;div class=&quot;heading&quot;&gt;
&lt;h1&gt;Office of the Controller Of Examination&lt;/h1&gt;
&lt;/div&gt;&lt;/center&gt;
&lt;center&gt;&lt;div class=&quot;heading2&quot;&gt;
K.Ramakrishna College Of Engineering (Autonomous)


&lt;/div&gt;&lt;/center&gt;
&lt;center&gt;
&lt;div class =&quot;heading3&quot;&gt;
NH-45,Samayapuram,Tiruchirappalli-621112.
&lt;/div&gt;
&lt;/center&gt;
&lt;center&gt;
&lt;div class =&quot;heading4&quot;&gt;&lt;b&gt;&lt;u&gt;Claim for Squad(Theory and practical)&lt;/u&gt;&lt;/b&gt;&lt;/div&gt;
&lt;/center&gt;
&lt;/div&gt;
&lt;/div&gt;&lt;/center&gt;
&lt;center&gt;&lt;h3&gt;B.E. /B.Tech. /M.E. /MBA End Semester Examination - &#39;
.htmlspecialchars($row[&quot;sem&quot;]).&#39;&lt;/h3&gt;&lt;/center&gt;
&lt;hr&gt;
&lt;br&gt;

&lt;label for=&quot;name&quot;&gt; NAME: &#39; . htmlspecialchars($row[&quot;name&quot;]) .&#39;&lt;/label&gt;
&lt;br&gt;
&lt;br&gt;

&lt;label for=&quot;designation&quot;&gt; DESIGNATION: &#39; . htmlspecialchars($row[&quot;designation&quot;]) .&#39;&lt;/label&gt;
&lt;br&gt;
&lt;br&gt;
&lt;label for=&quot;institution&quot;&gt; INSTITUTION: &#39; . htmlspecialchars($row[&quot;institution&quot;]) .&#39;&lt;/label&gt;
&lt;br&gt;
&lt;br&gt;
&lt;br&gt;
&lt;br&gt;
&lt;label for=&quot;contact&quot;&gt; CONTACT: &#39; . htmlspecialchars($row[&quot;contact&quot;]) .&#39;&lt;/label&gt;
&lt;br&gt;
&lt;br&gt;


&lt;label for=&quot;email&quot;&gt; EMAIL: &#39; . htmlspecialchars($row[&quot;email&quot;]) .&#39;&lt;/label&gt;
&lt;br&gt;
&lt;br&gt;
&lt;table border=1&gt;
&lt;thead&gt;
&lt;tr&gt;
&lt;th&gt;S.No.&lt;/th&gt;
&lt;th&gt;Date&lt;/th&gt;
&lt;th&gt;Renumeration(per session)&lt;/th&gt;
&lt;th&gt;Total&lt;/th&gt;
&lt;/tr&gt;

&lt;tbody&gt;;

&lt;tr&gt;
&lt;td&gt;1&lt;/td&gt;
&lt;td&gt;&#39; . $row[&quot;date&quot;] .&#39;&lt;/td&gt;
&lt;td&gt;&#39; . $amount .&#39;&lt;/td&gt;
&lt;td&gt;&#39; . $price .&#39;&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;&lt;/table&gt;
&lt;center&gt;

&lt;div class=&quot;header&quot;&gt;
&lt;center&gt;&lt;div class=&quot;heading&quot;&gt;
&lt;h1&gt;Renumeration Details For Squad&lt;/h1&gt;
&lt;/div&gt;&lt;/center&gt;
&lt;center&gt;&lt;div class=&quot;heading2&quot;&gt;
(Rs.500/- Per session for External)
&lt;/div&gt;&lt;/center&gt;
&lt;center&gt;

&lt;div class =&quot;heading3&quot;&gt;(Rs.250/- Per session for Internal)
&lt;/div&gt;
&lt;/center&gt;
&lt;center&gt;
&lt;div class =&quot;heading4&quot;&gt;&lt;b&gt;&lt;u&gt;TA &amp; DA - Rs.500/- (Only for External)&lt;/u&gt;&lt;/b&gt;&lt;/div&gt;
&lt;/center&gt;
&lt;/div&gt;
&lt;/div&gt;&lt;/center&gt;
&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;

&lt;div class=&quot;sign&quot;&gt;Signature of the Squad Member with Name&lt;/div&gt;

&lt;/body&gt;
&lt;/html&gt;&#39;;
}

} else {
echo &quot;0 results&quot;;
}
mysqli_close($conn);
}
?&gt;