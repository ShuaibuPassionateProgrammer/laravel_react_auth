import { useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import Home from "./Home.jsx";
import "bootstrap/dist/css/bootstrap.min.css";

const NotFound = () => {
    const navigate = useNavigate();

    useEffect(() => {
        setTimeout(() => {
            navigate("/");
        }, 5000);
    }, []);

    return <div>404 not found, back to homepage click <Link to={"/"}>here</Link></div>;
};

export default NotFound;