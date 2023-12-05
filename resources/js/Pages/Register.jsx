import React, { useState } from 'react'
import { useForm, Head } from '@inertiajs/react'
import FormGroup from '../components/FormGroup'


export default function Register() {

    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
        name: '',
    })

    const [success, setSuccess] = useState(false)

    function handleSubmit(e) {
        e.preventDefault()
        post('/register', {
            onSuccess: () => {
                setSuccess(true)
                // anything you want to run on successful form submission
            }
        })
    }

    return (
        <>
        <Head>
            <title>C1 - Register Page</title>
            <meta name="description" content="This is a sign up" />
        </Head>
            <form className="flex flex-col max-w-md mx-auto py-10" onSubmit={handleSubmit}>
                <FormGroup errorMessage={errors.name} label="Full name" type="text" value={data.name} onChange={e => setData('name', e.target.value)} name="name" />
                <FormGroup errorMessage={errors.email} label="Email" type="email" value={data.email} onChange={e => setData('email', e.target.value)} name="email" />
                <FormGroup errorMessage={errors.password} label="Password" type="password" name="password" value={data.password} onChange={e => setData('password', e.target.value)} />

                {success && <span className='text-green-500 text-lg'>You have signed up successfully</span>}

                <button disabled={processing} className="custom-button-style">Sign Up</button>
            </form>
        </>
    )
}
