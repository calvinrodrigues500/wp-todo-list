import React from 'react'
import { __ } from '@wordpress/i18n';
import { Button, Panel, PanelBody, PanelRow } from '@wordpress/components'
import { useState } from '@wordpress/element';

const App = () => {

	const [heading, setHeading] = useState("My To-Do List");
  const [isEditing, setIsEditing] = useState(false);

  const handleHeadingChange = (e) => {
    setHeading(e.target.value);
  };

  const handleHeadingClick = () => {
    setIsEditing(true);
  };

  const handleBlur = () => {
    setIsEditing(false);
  };

  const handleKeyDown = (e) => {
    if (e.key === 'Enter') {
      setIsEditing(false);
    }
  };
	
	return (
		<Panel>
			<PanelBody>
				<PanelRow>
				{isEditing || !heading ? (
        <input
          type="text"
          value={heading}
          onChange={handleHeadingChange}
          onBlur={handleBlur}
          onKeyDown={handleKeyDown}
          autoFocus
        />
      ) : (
        <p onClick={handleHeadingClick}>{heading}</p>
      )}
			<Button
				variant="primary"
			>
				{ __('Add', 'wp-todo-list') }
			</Button>
			</PanelRow>
			</PanelBody>
		</Panel>
	)
}

export default App