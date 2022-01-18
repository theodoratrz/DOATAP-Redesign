'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var CheckListItem = function (_React$Component) {
	_inherits(CheckListItem, _React$Component);

	function CheckListItem() {
		var _ref;

		var _temp, _this, _ret;

		_classCallCheck(this, CheckListItem);

		for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
			args[_key] = arguments[_key];
		}

		return _ret = (_temp = (_this = _possibleConstructorReturn(this, (_ref = CheckListItem.__proto__ || Object.getPrototypeOf(CheckListItem)).call.apply(_ref, [this].concat(args))), _this), _this.deleteItem = function () {
			_this.props.deleteCallback(_this.props.id);
		}, _this.toggleCheck = function () {
			_this.props.checkCallback(_this.props.id);
		}, _this.itemContentHTML = function (content, isChecked) {
			var checkedStyle = {
				textDecoration: 'line-through',
				opacity: 0.6
			};
			var nonCheckedStyle = {
				textDecoration: 'none'
			};
			var contentContainerStyle = {
				display: 'flex',
				flexDirection: 'row',
				justifyContent: 'space-between',
				width: '100%',
				padding: '0em 1em',
				alignItems: 'center'
			};

			var spanStyle = {
				transition: '750ms',
				maxWidth: '50%',
				overflowWrap: 'wrap',
				flex: '1'
			};
			Object.assign(spanStyle, isChecked ? checkedStyle : nonCheckedStyle);

			return React.createElement(
				'div',
				{ style: contentContainerStyle },
				_this.props.content.map(function (item, index) {
					return React.createElement(
						'span',
						{ key: 'item' + index, style: spanStyle },
						item
					);
				})
			);
		}, _temp), _possibleConstructorReturn(_this, _ret);
	}

	_createClass(CheckListItem, [{
		key: 'render',
		value: function render() {
			var itemContainer = {
				width: '100%',
				display: 'flex',
				flexDirection: 'row'
			};
			var deleteButton = {
				backgroundColor: 'transparent',
				border: '0px',
				outline: 'none',
				padding: '0em 1em'
			};
			return React.createElement(
				'div',
				{ style: itemContainer },
				React.createElement('input', { type: 'checkbox', style: { marginRight: "1%" }, onChange: this.toggleCheck,
					checked: this.props.isChecked }),
				this.itemContentHTML(this.props.content, this.props.isChecked),
				React.createElement(
					'button',
					{ style: deleteButton, onClick: this.deleteItem },
					React.createElement('i', { className: 'fas fa-trash' })
				)
			);
		}
	}]);

	return CheckListItem;
}(React.Component);

var CheckList = function (_React$Component2) {
	_inherits(CheckList, _React$Component2);

	function CheckList() {
		var props = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : undefined;

		_classCallCheck(this, CheckList);

		var _this2 = _possibleConstructorReturn(this, (CheckList.__proto__ || Object.getPrototypeOf(CheckList)).call(this, props));

		_this2.selectAllItems = function () {
			var _iteratorNormalCompletion = true;
			var _didIteratorError = false;
			var _iteratorError = undefined;

			try {
				for (var _iterator = _this2.state.items[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
					var item = _step.value;

					item.isChecked = true;
				}
			} catch (err) {
				_didIteratorError = true;
				_iteratorError = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion && _iterator.return) {
						_iterator.return();
					}
				} finally {
					if (_didIteratorError) {
						throw _iteratorError;
					}
				}
			}

			_this2.forceUpdate();
		};

		_this2.deleteCheckedItems = function () {
			var nonCheckedItems = [];
			var _iteratorNormalCompletion2 = true;
			var _didIteratorError2 = false;
			var _iteratorError2 = undefined;

			try {
				for (var _iterator2 = _this2.state.items[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
					var item = _step2.value;

					if (!item.isChecked) {
						nonCheckedItems.push(item);
					}
				}
			} catch (err) {
				_didIteratorError2 = true;
				_iteratorError2 = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion2 && _iterator2.return) {
						_iterator2.return();
					}
				} finally {
					if (_didIteratorError2) {
						throw _iteratorError2;
					}
				}
			}

			_this2.setState({
				items: nonCheckedItems
			});
		};

		_this2.addItem = function (itemContent) {
			var newItem = {
				key: 'listItem' + _this2.state.keyCounter++,
				content: itemContent,
				isChecked: false
			};
			var updatedItems = _this2.state.items.slice();
			updatedItems.push(newItem);

			_this2.setState({
				items: updatedItems
			});
		};

		_this2.checkedItemExists = function () {
			return _this2.state.items.findIndex(function (item) {
				return item.isChecked === true;
			}) !== -1;
		};

		_this2.deleteItem = function (key) {
			var updatedItems = [];
			var _iteratorNormalCompletion3 = true;
			var _didIteratorError3 = false;
			var _iteratorError3 = undefined;

			try {
				for (var _iterator3 = _this2.state.items[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
					var item = _step3.value;

					if (item.key !== key) {
						updatedItems.push(item);
					}
				}
			} catch (err) {
				_didIteratorError3 = true;
				_iteratorError3 = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion3 && _iterator3.return) {
						_iterator3.return();
					}
				} finally {
					if (_didIteratorError3) {
						throw _iteratorError3;
					}
				}
			}

			_this2.setState({
				items: updatedItems
			});
		};

		_this2.toggleItemCheck = function (key) {
			var _iteratorNormalCompletion4 = true;
			var _didIteratorError4 = false;
			var _iteratorError4 = undefined;

			try {
				for (var _iterator4 = _this2.state.items[Symbol.iterator](), _step4; !(_iteratorNormalCompletion4 = (_step4 = _iterator4.next()).done); _iteratorNormalCompletion4 = true) {
					var item = _step4.value;

					if (item.key === key) {
						item.isChecked = !item.isChecked;
						break;
					}
				}
			} catch (err) {
				_didIteratorError4 = true;
				_iteratorError4 = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion4 && _iterator4.return) {
						_iterator4.return();
					}
				} finally {
					if (_didIteratorError4) {
						throw _iteratorError4;
					}
				}
			}

			_this2.forceUpdate();
		};

		_this2.itemComponents = function (items) {
			var itemComponents = [];

			var _iteratorNormalCompletion5 = true;
			var _didIteratorError5 = false;
			var _iteratorError5 = undefined;

			try {
				for (var _iterator5 = items[Symbol.iterator](), _step5; !(_iteratorNormalCompletion5 = (_step5 = _iterator5.next()).done); _iteratorNormalCompletion5 = true) {
					var item = _step5.value;

					itemComponents.push(React.createElement(CheckListItem, { key: item.key, id: item.key, content: item.content, isChecked: item.isChecked,
						deleteCallback: _this2.deleteItem, checkCallback: _this2.toggleItemCheck }));
				}
			} catch (err) {
				_didIteratorError5 = true;
				_iteratorError5 = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion5 && _iterator5.return) {
						_iterator5.return();
					}
				} finally {
					if (_didIteratorError5) {
						throw _iteratorError5;
					}
				}
			}

			return itemComponents;
		};

		_this2.state = {
			keyCounter: 0,
			items: []
		};
		return _this2;
	}

	_createClass(CheckList, [{
		key: 'render',
		value: function render() {

			var itemContainerStyle = {
				display: 'flex',
				flexDirection: 'column',
				rowGap: '.25em',
				width: '100%',
				maxHeight: '10rem',
				overflowY: 'scroll'
			};

			var buttonsContainerStyle = {
				display: 'flex',
				flexDirection: 'row',
				justifyContent: 'space-between',
				width: "100%"
			};

			var buttonStyle = {
				fontSize: '18px',
				padding: '.15em .8em'
			};

			return React.createElement(
				'div',
				{ style: this.props.containerStyle },
				React.createElement(
					'div',
					{ style: itemContainerStyle },
					this.itemComponents(this.state.items)
				),
				React.createElement(
					'div',
					{ style: buttonsContainerStyle },
					this.state.items.length > 0 ? React.createElement(
						'button',
						{ type: 'button', className: 'btn btn-primary', style: buttonStyle, onClick: this.selectAllItems },
						this.props.selectAllMsg
					) : React.createElement(
						'button',
						{ type: 'button', className: 'btn btn-primary', style: buttonStyle, disabled: true },
						this.props.selectAllMsg
					),
					this.checkedItemExists() ? React.createElement(
						'button',
						{ type: 'button', className: 'btn btn-primary', style: buttonStyle,
							onClick: this.deleteCheckedItems },
						this.props.deleteCheckedMsg
					) : React.createElement(
						'button',
						{ type: 'button', className: 'btn btn-primary', style: buttonStyle, disabled: true },
						this.props.deleteCheckedMsg
					)
				)
			);
		}
	}]);

	return CheckList;
}(React.Component);

var containerStyle = {
	display: 'flex',
	flexDirection: 'column',
	rowGap: '.25em',
	maxWidth: '25em',
	width: '100%',
	alignItems: 'center'
};

var checklistWrapper = {
	display: 'flex',
	flexDirection: 'column',
	rowGap: '.25em',
	width: '100%',
	alignItems: 'center'
};

var checklistTitles = {
	display: 'flex',
	flexDirection: 'row',
	justifyContent: 'space-between',
	padding: '0em min(8em, 20vw) 0em 1em',
	borderBottom: '2px solid #0055c3',
	fontWeight: 'bolder',
	width: '100%'

	// React places the rendered component as innerHTML for the selected DOM element 
};var domContainer = document.querySelector('#checklist_container');
ReactDOM.render(React.createElement(
	'div',
	{ style: checklistWrapper },
	React.createElement(
		'div',
		{ style: checklistTitles },
		React.createElement(
			'span',
			null,
			'\u039C\u03AC\u03B8\u03B7\u03BC\u03B1'
		)
	),
	React.createElement(CheckList, { ref: function ref(checkListComponent) {
			window.checkListComponent = checkListComponent;
		},
		containerStyle: containerStyle, selectAllMsg: 'Επιλογή Όλων', deleteCheckedMsg: 'Διαγραφή Επιλεγμένων' })
), domContainer);

// To refer to the component from the DOM, use `window.checkListComponent`