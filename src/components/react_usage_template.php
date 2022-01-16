
<style>
    .checklist-container {
        flex: 1;
    }
    .checklist-input {
        background-color: transparent;
        outline: none;
        border: none;
        border-bottom: 2px solid #0055c3;
        margin-right: 1%;
        width: 15rem;
        color: black;
    }
    .checklist-input::placeholder {
        font-style: italic;
    }
    .inputs-wrapper {
        display: flex;
        flex-direction: column;
        row-gap: .5em;
    }
    .input-fields-button-wrapper {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        column-gap: 1em;
        row-gap: .35em;
    }
</style>
<script>
    function stoppedTyping() {
        const input1 = document.getElementById("checklist-input1");
        const input2 = document.getElementById("checklist-input2");
        if ((input1.value === "") || (input2.value === "")) {
            document.getElementById("add-item-button").disabled = true;
        } else {
            document.getElementById("add-item-button").disabled = false;
        }
    }
    function addChecklistItem() {
        const input1 = document.getElementById("checklist-input1");
        const input2 = document.getElementById("checklist-input2");
        window.checkListComponent.addItem([input1.value, input2.value]);
        input1.value = "";
        input2.value = "";
        document.getElementById("add-item-button").disabled = true;
    }
    function submitData() {
        const dataJSON = {
            departments: window.checkListComponent.state.items.map(item => item.content)
        }
        $.ajax({
            type: "POST",
            url: "/demo_respond.php",
            dataType: "json",
            success: answer => {
                console.log(`Submitted!`)
                console.log(answer)
            },
            error: answer => {
                window.alert("Failed...")
                console.log(`Failed...`)
                console.log(answer)
            },
            data: dataJSON
        })
    }
</script>
<div style="display: flex; flex-direction: column; row-gap: 2em;">
    <div class="input-fields-button-wrapper">
        <div class="inputs-wrapper">
            <input id="checklist-input1" oninput="stoppedTyping()" placeholder="Επιλέξτε Πανεπιστημιακό Ίδρυμα..."
             class="checklist-input" type="text"/>
            <input id="checklist-input2" oninput="stoppedTyping()" placeholder="Επιλέξτε Τμήμα..."
             class="checklist-input" type="text"/>
        </div>
        <button id="add-item-button" style="font-size:18px" class="btn btn-primary" onclick="addChecklistItem()" disabled>
            Προσθήκη
        </button>
    </div>
    <!-- Using React component -->
    <div id="checklist_container" class="checklist-container"></div>
</div>

<button onclick="submitData()">Send</button>

<!-- Required scripts for React
https://reactjs.org/docs/add-react-to-a-website.html#optional-try-react-with-jsx -->

<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<!-- For JSX -->
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<!-- text/babel needed for JSX -->
<script type="text/babel" src="/js/react_test.js"></script>