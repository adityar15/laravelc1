import React from 'react'

export default function Register() {
    return (
        <form action="/register" method="POST">
            <input type="text" name="name" />
            <input type="email" name="email" />
            <input type="password" name="password" />
            <button>Sign Up</button>
        </form>
    )
}
