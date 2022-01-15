<?php

const table_content = array(
    "Βασικές Πληροφορίες" => array(
        "basic_info",
        '<p><strong>This is some placeholder content the Βασικές Πληροφορίες tab\'s associated content.</strong>
        Clicking another tab will toggle the visibility of this one for the next.
        The tab JavaScript swaps classes to control the content visibility and styling.
        You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
    ),
    "Επιλεγμένα Τμήματα" => array(
        "selected_deps",
        '<p><strong>This is some placeholder content the Επιλεγμένα Τμήματα tab\'s associated content.</strong>
        Clicking another tab will toggle the visibility of this one for the next.
        The tab JavaScript swaps classes to control the content visibility and styling.
        You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
    ),
    "Επιλογές Αντιστοίχησης" => array(
        "course_choices",
        '<p><strong>This is some placeholder content the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
        Clicking another tab will toggle the visibility of this one for the next.
        The tab JavaScript swaps classes to control the content visibility and styling.
        You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
    ),
);

function echoTableHeader(string $title, bool $active)
{
    echo '
    <div class="table">
        <thead>
        <tr>
         <th scope="col">
            ' . $title . '
            </th>
            <th scope="col">
            ' . $title . '
            </th>
            </tr>
        </thead>
    </div>
    ';
}

function echoTableSubcontent(string $tabID, string $contentInnerHTML, bool $active)
{
    echo '
    <div class="tab-pane fade show ' . ($active ? 'active' : '') . '" id="' . $tabID . '"
        role="tabpanel" aria-labelledby="' . $tabID . '-tab">
    ' . $contentInnerHTML .'
    </div>
    ';
}

function echoContentsTable(array $content) {
    echo '
    <ul class="nav nav-tabs" id="tabHeaders" role="tablist">
    ';
    $cur = 0;
    foreach ($content as $title => $value) {
        $tabID = $value[0];
        echoTableHeader($title, $tabID, $cur === 0);
        $cur++;
    }
    echo '
    </ul>';

    echo '
    <div class="tab-content" id="tabContents">
    ';
    $cur = 0;
    foreach ($content as $title => $value) {
        $tabID = $value[0];
        $subcontent = $value[1];
        echoTableSubcontent($tabID, $subcontent, $cur === 0);
        $cur++;
    }
    echo '
    </div>';
}

?>

<link rel="stylesheet" href="/css/content_tabs.css">
<div class="tab-wrapper">
    <?php
    echoContentsTable(table_content);
    ?>
</div>
