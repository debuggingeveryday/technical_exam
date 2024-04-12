import { Children } from "react";

export const Show = (props) => {
    let when = null;
    let otherwise = null;

    Children.forEach(props.children, (children) => {
        if (children.props.isTrue === undefined) {
            otherwise = children;
        } else if (!when && children.pros.isTrue === true) {
            when = children;
        }
    });

    return when || otherwise;
};

Show.When = ({ isTrue, children }) => isTrue && children;
Show.Else = ({ render, children }) => render || children;
