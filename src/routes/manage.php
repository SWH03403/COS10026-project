<?php
$db = Database::get();
$infos = [];

foreach ($db->query('SELECT * FROM eoi') as $row) {
    $applicant_info = $db->query('SELECT * FROM user_applicant WHERE id = ?', [$row['user_id']]);
    $infos[] = $row + ['applicant_info' => $applicant_info];

    // var_dump($row + ['applicant_info' => $applicant_info]);
    // $entry = &$cates[$row['id']];
	// $entry['id'] = "category-" . strtolower(str_replace(' ', '-', $row['name']));
	// $entry['name'] = $row['name'];
	// $entry['entries'] = [];
}
//exit;

$search = $_GET['search'] ?? '';
$delete = $_GET['delete'] ?? '';

$searchTags = [
    'job:' => 'job_id', 
    'user_id:'  => 'user_id', 
    'first_name:'  => 'first_name', 
    'last_name:'  => 'last_name', 
];

render_page(function() use ($infos, $search, $searchTags) {
	echo 
    '
    <section id="tool-box" class="flex flex-y">
        <aside id="search-bar" class="flex-y box">
            <form method="GET" action=""
                <label>Search: </label><br>
                <input type="text" 
                name="search" 
                placeholder="user_name: Bob..." value="' . html_sanitize($search) . '"
            >

                <input type="Submit" value="Search">
            </form>
        </aside>

        <aside id="delete-bar" class="flex-y box">
            <form method="GET" action="">
                <label>Delete: </label><br>
                <input type="text" name="delete" placeholder="user_name: Bob..."
                value=""
                >
                <input type="Submit" value="Delete">
            </form>            
        </aside>

        <aside id="guide-bar" class="flex-y box">
            <p>Tag guide: </p>
            <ul>
                <li>Use tag "job:" to filter for jobs ("job: VKE99, ZBA91;") </li>
                <li>Use tag "user_id:" to filter specific applicant id ("user_id: 24125;")</li>
                <li>Use tag "first_name:" to filter specific first name ("first_name: Bob, Jake;")</li>
                <li>Other tags: last_name, user_name (find full name)</li>
            </ul>
        </aside>
    </section>
    

    <div id="listing-eois" class="fill flex-y box">';
    if ($search) {
        $terms = explode(';', $search);
        $filtered = $infos;

        foreach ($searchTags as $tag => $infoKey) {
            foreach ($terms as $term) {
                // var_dump($term, $tag);
                // var_dump(str_starts_with($term, $tag));
                $term = trim($term);
                if (str_starts_with($term, $tag)) {
                    $extractedInfo = array_map('trim', explode(',', substr($term, strlen($tag))));

                    $filtered = 
                    array_filter($filtered, function($info) use ($extractedInfo, $infoKey) {
                        return in_array($info[$infoKey], $extractedInfo);
                    });
                }
            }
        }
        foreach ($filtered as $info) { render('eoi/eoi_info', $info); }
    } else {
        foreach ($infos as $info) { render('eoi/eoi_info', $info); }
    }

    echo '</div>';
	
},
	title: 'Management',
	style: 'manage',
);
