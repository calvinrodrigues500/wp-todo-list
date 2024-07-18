import { createRoot } from '@wordpress/element';
import App from './App';

const rootElement = document.getElementById('wp-todo-list');
console.log('rootElement: ', rootElement);

const root = createRoot(rootElement);
root.render(<App />);