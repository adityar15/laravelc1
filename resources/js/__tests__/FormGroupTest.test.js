import React from "react"
import renderer from 'react-test-renderer';

import FormGroup from "../components/FormGroup";

test('renders the FormGroup with props', () => {
  
  const props = {
    label: "Test Label",
    name: "testName",
    type: "text",
    className: "test-class",
    placeholder: "Enter text",
    errorMessage: "Test error message"
  };

    // match snapshot of entire component
    const component = renderer.create(<FormGroup {...props} />);
    let tree = component.toJSON();
    expect(tree).toMatchSnapshot();


  });