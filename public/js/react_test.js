'use strict';

class TodoItem extends React.Component {

	deleteItem = () => {
		this.props.deleteCallback(this.props.id);
	}

	toggleCheck = () => {
		this.props.checkCallback(this.props.id);
	}

	itemContentHTML = (content, isChecked) => {
		const checkedStyle = {
			transition: '750ms',
			textDecoration: 'line-through',
			opacity: 0.6
		}
		const nonCheckedStyle = {
			transition: '750ms',
			textDecoration: 'none'
		}
		let contentContainerStyle = {
			display: 'flex',
			flexDirection: 'row',
			justifyContent: 'space-between',
			width: '100%'
		}

		const spanStyle = {
			maxWidth: '50%',
			overflowWrap: 'wrap'
		}
		Object.assign(contentContainerStyle, isChecked ? checkedStyle : nonCheckedStyle);

		return (
			<div style={contentContainerStyle}>
				<span style={spanStyle}>{content[0]}</span>
				<span style={spanStyle}>{content[1]}</span>
			</div>
		);
	}

	render() {
		const itemContainer = {
			width: '100%',
			display: 'flex',
			flexDirection: 'row'
		};
		return (
			<div style={itemContainer}>
				<input type="checkbox" style={{marginRight: "1%"}} onChange={this.toggleCheck}
				checked={this.props.isChecked}/>
				{this.itemContentHTML(this.props.content, this.props.isChecked)}
				<button className="delete-button" onClick={this.deleteItem}>Delete</button>
			</div>
		);
	}
}

class TodoCheckList extends React.Component {

	constructor(props = undefined) {
		super(props);
		/* if (props === undefined) {
			this.state = {}
		} else {
			// Maybe this will be needed
			this.state = {}
		} */
		this.state = {
			keyCounter: 0,
			items: [],
			inputText: "",
		}
	}	

	updateInputText = event => {
		this.setState({inputText: event.target.value})
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

	addItem = (event) => {
		event.preventDefault();
		const newItem = {
			key: `listItem${this.state.keyCounter++}`,
			content: this.state.inputText,
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
			}
		}
		this.setState( {
			items: this.state.items
		});
	}

	itemComponents = (items) => {
		let itemComponents = [];

		for (const item of items) {
			itemComponents.push(
				<TodoItem key={item.key} id={item.key} content={[item.content, 'placeholder']} 
				deleteCallback={this.deleteItem} checkCallback={this.toggleItemCheck}/>
			)
		}

		return itemComponents;
	}

	render() {
		
		// input text field style
		const inputStyle = {
			backgroundColor: 'transparent',
			color: 'white',
			outline: 'none',
			border: 'none',
			borderBottom: '2px solid blue',
			marginRight: '1%',
			width: '15rem',
			color: 'black'
		}

		const formStyle = {
			display: 'flex',
			flexDirection: 'row',
			justifyContent: 'start',
			width: '100%'
		}
		
		const containerStyle = {
			maxWidth: '25rem',
			width: '25rem'
		}
		return (
		<div style={containerStyle}>
			{this.itemComponents(this.state.items)}
			<form style={formStyle} className="new-item-form" onSubmit={this.addItem}>            
				<input style={inputStyle} onChange={this.updateInputText} value={this.state.inputText}
				onSubmit={this.addItem} className="new-item-input"/>
				<button type="submit" className="operation-button">Add+</button>

				{this.checkedItemExists() ? 
				<button type="button" onClick={this.deleteCheckedItems} className="operation-button">
				Delete Checked</button> : []}
			</form>
		</div>
		);
	}
}

// React places the rendered component as innerHTML for the selected DOM element 
const domContainer = document.querySelector('#checklist_container');
ReactDOM.render(<TodoCheckList ref={(checkListComponent) => {window.checkListComponent = checkListComponent}}/>, domContainer);
/* 
 To refer to the component from the DOM, use `window.checkListComponent`
*/
