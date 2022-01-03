<link rel="stylesheet" href="css/content_accordion.css">

<?php

    const sampleContent = array(
        array(
            "<b>header1</b>",
            "<p3>content1</p3>"
        ),
        array(
            "<i>header2</i>",
            "<b>content2</b>"
        ),
        array(
            "<span>header3</span>",
            "<code>content3</code>"
        )
    );

    function echoAccordion(array $contents, bool $stayOpen) {
        echo "<div class='accordion accordion-flush' id='contentAccordionFlush'>";

        foreach ($contents as $index => $pair) {
            echo "<div class='accordion-item'>";
            
            echoAccordionHeader($pair[0], $index);
            
            echoAccordionContent($pair[1], $index, $stayOpen);

            echo "</div>";
        }

        echo "</div>";
    }

    function echoAccordionHeader(string $headerInnerHTML, int $index)
    {
        echo "<h2 class='accordion-header' id='flush-heading$index'>";
        echo "
        <button class='accordion-button collapsed shadow-none' type='button' data-bs-toggle='collapse'
            data-bs-target='#flush-collapse$index' aria-expanded='false' aria-controls='flush-collapse$index'>
        ";
        echo $headerInnerHTML;
        echo "</button>";
        echo "</h2>";
    }

    function echoAccordionContent(string $contentInnerHTML, int $index, bool $stayOpen)
    {
        echo "<div id='flush-collapse$index' class='accordion-collapse collapse' 
        aria-labelledby='flush-heading$index'";

        if (!$stayOpen) {
            echo "data-bs-parent='#contentAccordionFlush'";
        }

        echo "
        >
            <div class='accordion-body'>$contentInnerHTML</div>
        </div>
        ";
    }

    echoAccordion(sampleContent, true);
?>
