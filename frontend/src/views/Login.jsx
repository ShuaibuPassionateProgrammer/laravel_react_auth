import React, { useState, createRef } from "react";
import { Link } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider.jsx";
import axiosClient from "../axios-client.js";

const Login = () => {
    const emailRef = createRef();
    const passwordRef = createRef();
    const {setUser, setToken} = useStateContext();
    const [message, setMessage] = useState();

    const onSubmit = (ev) => {
        ev.preventDefault();
        const payload = {
            email: emailRef.current.value,
            password: passwordRef.current.value
        };
        console.log(payload);
        axiosClient.post("/login", payload)
        .then(({data}) => {
            setUser(data.user);
            setToken(data.token);
        })
        .catch(err => {
            const response = err.response;
            if(response && response.status === 422) {
                setMessage(response.data.message);
            }
        });
    };

    return (
        <div className="login-signup-form animated fadeInDown">
            <div className="form">
                <form onSubmit={onSubmit}>
                    <h1>Login into your account</h1>
                    {message && <div className="alert">
                        <p>{message}</p>
                    </div>}
                    <input ref={emailRef} type="email" placeholder="Email" />
                    <input ref={passwordRef} type="password" placeholder="Password" />
                    <button className="btn btn-block">Login</button>
                    <p className="message">
                        Not Registered? <Link to={"/signup"}>Create an account</Link>
                    </p>
                </form>
            </div>
        </div>
    );
};

export default Login;
/*
curl -X POST http://127.0.0.1:8000/api/login \
-H "Content-Type: application/json" \
-d '{"email": "test@example.com", "password": "password"}' 
*/