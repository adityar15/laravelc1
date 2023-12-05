import React from 'react'
import { useForm, Head } from '@inertiajs/react'
import FormGroup from '../components/FormGroup'


export default function Login() {

    const { data, setData, post, processing, errors, setError } = useForm({
        email: '',
        password: '',
        name: '',
    })

    function handleSubmit(e) {
        e.preventDefault()
        post('/login', {
            onSuccess: () => {
                setError('emeil', "Invalid email or password")
                // logic to redirect
                // anything you want to run on successful form submission

            }
        })
    }

    return (
        <>
            <Head>
                <title>C1 - Login Page</title>
                <meta name="description" content="This is a sign in page" />
            </Head>
            <form className="flex flex-col max-w-md mx-auto py-10" onSubmit={handleSubmit}>
                <FormGroup errorMessage={errors.email} label="Email" type="email" value={data.email} onChange={e => setData('email', e.target.value)} name="email" />

                <FormGroup errorMessage={errors.password} label="Password" type="password" name="password" value={data.password} onChange={e => setData('password', e.target.value)} />

                <button disabled={processing} className="custom-button-style font-bold">Sign In</button>
            </form>
        </>
    )
}
