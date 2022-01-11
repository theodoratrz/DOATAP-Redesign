
<!-- Using React component -->
<div id="checklist_container"></div>

<style>
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
</style>
<script>
    function addChecklistItem() {
        const input1 = document.getElementById("checklist-input1");
        const input2 = document.getElementById("checklist-input2");
        window.checkListComponent.addItem([input1.value, input2.value]);

        input1.value = "";
        input2.value = "";
    }
</script>
<input id="checklist-input1" placeholder="Επιλέξτε Πανεπιστημιακό Ίδρυμα..." class="checklist-input" type="text"/>
<input id="checklist-input2" placeholder="Επιλέξτε Τμήμα..."class="checklist-input" type="text"/>
<button onclick="addChecklistItem()">Add Item</button>

<!-- Required scripts for React
https://reactjs.org/docs/add-react-to-a-website.html#optional-try-react-with-jsx -->

<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<!-- For JSX -->
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<!-- text/babel needed for JSX -->
<script type="text/babel" src="/public/js/react_test.js"></script>
