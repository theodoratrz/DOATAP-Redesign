'use strict';

class CheckListItem extends React.Component {

	deleteItem = () => {
		this.props.deleteCallback(this.props.id);
	}

	toggleCheck = () => {
		this.props.checkCallback(this.props.id);
	}

	itemContentHTML = (content, isChecked) => {
		let contentContainerStyle = {
			display: 'flex',
			flexDirection: 'row',
			justifyContent: 'space-between',
			width: '100%',
			padding: '0em 1em',
			alignItems: 'center'
		}

		const spanStyle = {
			transition: '750ms',
			maxWidth: '50%',
			overflowWrap: 'wrap',
			flex: '1'
		}

		return (
			<div style={contentContainerStyle}>
				{content.map((item, index) => <span key={`item${index}`} style={spanStyle}>{item}</span>)}
			</div>
		);
	}

	render() {
		const itemContainer = {
			width: '100%',
			display: 'flex',
			flexDirection: 'row',
			alignItems: 'center'
		};
		const deleteButton = {
			backgroundColor: 'transparent',
			border: '0px',
			outline: 'none',
			padding: '0em 1em'
		}
		return (
			<div style={itemContainer}>
				<input type="checkbox" style={{marginRight: "1%"}} onChange={this.toggleCheck}
				checked={this.props.isChecked}/>
				{this.itemContentHTML(this.props.content, this.props.isChecked)}
				<button style={deleteButton} onClick={this.deleteItem}>
					<i className="fas fa-trash"></i>
				</button>
			</div>
		);
	}
}

class CheckList extends React.Component {

	constructor(props = undefined) {
		super(props);
		this.state = {
			keyCounter: 0,
			items: []
		}
	}

	selectAllItems = () => {
		for (const item of this.state.items) {
			item.isChecked = true;
		}
		this.forceUpdate();
	}

	deleteCheckedItems = () => {
		let nonCheckedItems = [];
		for (const item of this.state.items) {
			if ( !item.isChecked )
			{
				nonCheckedItems.push(item);
			}
		}
		this.setState({
			items: nonCheckedItems
		});
	}

	addItem = (itemContent)  => {
		const newItem = {
			key: `listItem${this.state.keyCounter++}`,
			content: itemContent,
			isChecked: false
		}
		let updatedItems = this.state.items.slice();
		updatedItems.push(newItem);

		this.setState({
			items: updatedItems
		});
	}

	checkedItemExists = () => {
		return (this.state.items.findIndex(item => item.isChecked === true) !== -1);
	}

	deleteItem = (key) => {
		let updatedItems = [];
		for (const item of this.state.items) {
			if ( item.key !== key ) {
				updatedItems.push(item);
			}
		}
		this.setState( {
			items: updatedItems
		});
	}

	toggleItemCheck = (key) => {
		for (const item of this.state.items) {
			if ( item.key === key ) {
				item.isChecked = !item.isChecked;
				break;
			}
		}
		this.forceUpdate();
	}

	itemComponents = (items) => {
		let itemComponents = [];

		for (const item of items) {
			itemComponents.push(
				<CheckListItem key={item.key} id={item.key} content={item.content} isChecked={item.isChecked}
				deleteCallback={this.deleteItem} checkCallback={this.toggleItemCheck}/>
			)
		}

		return itemComponents;
	}

	render() {
		
		const itemContainerStyle = {
			display: 'flex',
			flexDirection: 'column',
			rowGap: '.25em',
			width: '100%',
			maxHeight: '10rem',
			overflowY: 'scroll'
		}

		const buttonsContainerStyle = {
			display: 'flex',
			flexDirection: 'row',
			justifyContent: 'space-between',
			width: "100%"
		}

		const buttonStyle = {
			fontSize: '18px',
			padding: '.15em .8em'
		}
		
		return (
		<div style={this.props.containerStyle}>
			<div style={itemContainerStyle}>
				{this.itemComponents(this.state.items)}
			</div>
			<div style={buttonsContainerStyle}>
				{
					this.state.items.length > 0 ?
					<button type="button" className="btn btn-primary" style={buttonStyle} onClick={this.selectAllItems}>
						{this.props.selectAllMsg}
					</button>:
					<button type="button" className="btn btn-primary" style={buttonStyle} disabled>
						{this.props.selectAllMsg}
					</button>
				}
				{
					this.checkedItemExists() ? 
					<button type="button" className="btn btn-primary" style={buttonStyle}
					onClick={this.deleteCheckedItems}>
						{this.props.deleteCheckedMsg}
					</button> :
					<button type="button" className="btn btn-primary" style={buttonStyle} disabled>
						{this.props.deleteCheckedMsg}
					</button>
				}
			</div>
		</div>
		);
	}
}

const containerStyle = {
	display: 'flex',
	flexDirection: 'column',
	rowGap: '.25em',
	maxWidth: '25em',
	width: '100%',
	alignItems: 'center'
}

const checklistWrapper = {
	display: 'flex',
	flexDirection: 'column',
	rowGap: '.25em',
	width: '100%',
	alignItems: 'center'
}

const checklistTitles = {
	display: 'flex',
	flexDirection: 'row',
	justifyContent: 'space-between',
	padding: '0em min(8em, 20vw) 0em 1em',
	borderBottom: '2px solid #0055c3',
	fontWeight: 'bolder',
	width: '100%'
}

// React places the rendered component as innerHTML for the selected DOM element 
const domContainer = document.querySelector('#checklist_container');
ReactDOM.render(
	<div style={checklistWrapper}>
		<div style={checklistTitles}>
            <span>Μάθημα</span>
        </div>
		<CheckList ref={(checkListComponent) => {window.checkListComponent = checkListComponent}}
		containerStyle={containerStyle} selectAllMsg={'Επιλογή Όλων'} deleteCheckedMsg={'Διαγραφή Επιλεγμένων'}/>
	</div>
, domContainer);
 
// To refer to the component from the DOM, use `window.checkListComponent`
