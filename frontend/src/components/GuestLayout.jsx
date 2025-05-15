import { Navigate, Outlet } from "react-router-dom";
import { useStateContext } from  "../context/ContextProvider.jsx";

const GuestLayout = () => {
    const {token} = useStateContext();
    
    if(token) {
        <Navigate to="/" />
    }

    return (
        <div className="login-signup-form animated fadeInDown">
            <div>For guest users only</div>
            <Outlet />
        </div>
    );
};

export default GuestLayout;