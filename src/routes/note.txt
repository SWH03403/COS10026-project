<?php
Session::require_user(true);

$db = Database::get();
$infos = [];

foreach ($db->query('SELECT * FROM eoi') as $row) {
    $applicant_info = $db->query('SELECT * FROM user_applicant WHERE id = ?', [$row['user_id']]);
    $infos[] = $row + ['applicant_info' => $applicant_info];

    //var_dump($row + ['applicant_info' => $applicant_info]);
}
//exit;

$search = $_GET['search'] ?? '';
$delete = $_GET['delete'] ?? '';
$confirm_delete = $_POST['confirm_delete'] ?? '';
$status_change = $_GET['status_change'] ?? '';
$confirm_change = $_POST['confirm_change'] ?? '';
$accpeted_statuses = ['New', 'Current', 'Final'];

$searchTags = [
    'job_id:' => 'job_id', 
    'user_id:'  => 'user_id', 
    'first_name:'  => 'first_name', 
    'last_name:'  => 'last_name', 
];

render_page(function() use ($infos, $search, $searchTags, $delete, $status_change, $confirm_change, $confirm_delete,$accpeted_statuses) {
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
                value="' . html_sanitize($delete) . '"
                >
                <input type="Submit" value="Delete">
            </form>            
        </aside>

        <aside id="status-change-bar" class="flex-y box">
            <form method="GET" action="">
                <label>Status change: </label><br>
                <input type="text" name="status_change" placeholder="user_name: Bob... -> New"
                value="' . html_sanitize($status_change) . '"
                >
                <input type="Submit" value="Change">
            </form>            
        </aside>

        <aside id="guide-bar" class="flex-y box">
            <p>Tag guide: </p>
            <ul>
                <li>Use tag "job_id:" to filter for jobs ("job: VKE99, ZBA91;") </li>
                <li>Use tag "user_id:" to filter specific applicant id ("user_id: 24125;")</li>
                <li>Use tag "first_name:" to filter specific first name ("first_name: Bob, Jake;")</li>
                <li>Other tags: last_name</li>
                <li>3 Available status: New, Current, Final</li>
            </ul>
        </aside>
    </section>
    

    <div id="listing-eois" class="fill flex-y box">';

    if ($search || $delete || $status_change) {
        if ($delete) {
            echo '
            <form method="POST" action="">
                <label>Are you sure you want to delete these eois?</label><br>
                <input type="Submit" name="confirm_delete" value="Confirm Delete">
            </form>
            ';

            $terms = explode(';', $delete);
        } elseif ($status_change) {
            echo '
            <form method="POST" action="">
                <label>Are you sure you want to change status of these eois to "' . trim(explode('->', $status_change)[1] ?? '') . '"?</label><br>
                <input type="Submit" name="confirm_change" value="Confirm Change">
            </form>
            ';
            $terms = trim(explode('->', $status_change)[0] ?? '');
            $terms = explode(';', $terms);
        } else {
            $terms = explode(';', $search);
        }

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
                        if (array_key_exists($infoKey, $info)) {
                            return in_array($info[$infoKey], $extractedInfo);
                        }

                        if (isset($info['applicant_info'][0]) && array_key_exists($infoKey, $info['applicant_info'][0])) {
                            return in_array($info['applicant_info'][0][$infoKey], $extractedInfo);
                        }

                        return false;
                    });
                }
            }
        }
        foreach ($filtered as $info) { 
            if ($delete && $confirm_delete) {
                $db = Database::get();
                $db->query('DELETE FROM eoi WHERE id = ?', [$info['id']]);
                continue;
            } elseif ($status_change && $confirm_change) {
                $new_status = trim(explode('->', $status_change)[1] ?? '');
                //var_dump(array_key_exists($new_status,$accpeted_statuses));
                if (in_array($new_status,$accpeted_statuses)) {
                    $db = Database::get();
                    $db->query('UPDATE eoi SET status = ? WHERE id = ?', [$new_status, $info['id']]);
                    $info['status'] = $new_status;
                } else {
                    continue;
                }
            }
            render('eoi/eoi_info', $info); 
        }
    } else {
        foreach ($infos as $info) { render('eoi/eoi_info', $info); }
    }

    echo '</div>';
	
},
	title: 'Management',
	style: 'manage',
);
