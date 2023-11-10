import React, {useState} from 'react'
import {Head, useForm} from '@inertiajs/react'
import FormGroup from '../components/FormGroup'



export default function Dashboard() {

    const {data, setData, errors, post, reset} = useForm({
        title: '',
        slug: '',
        article: ''
    })

    const [success, setSuccess] = useState(false)

    function handleSubmit(e)
    {
        e.preventDefault()
        post('/blog', {
            onSuccess: () =>{
                setSuccess(true)
                reset()
            }
        })
    }

    return (
        <>
            <Head>
                <title>C1 - Dashboard Page</title>
                <meta name="description" content="This is a sign in page" />
            </Head>
           <div className="max-w-md mx-auto py-10">
                <h1 className='text-xl font-semibold'>Add a new article</h1>

                <form className='flex flex-col my-6 gap-4' onSubmit={handleSubmit}>
                    <FormGroup errorMessage={errors.title} value={data.title} onChange={(e) => setData('title', e.target.value)} label="Title" type="text" name="title" placeholder="Title of article" />
                    <FormGroup errorMessage={errors.slug} value={data.slug} onChange={(e) => setData('slug', e.target.value)} label="Slug" type="text" name="slug" placeholder="Slug of the article" />
                    <FormGroup errorMessage={errors.article} value={data.article} onChange={(e) => setData('article', e.target.value)} label="Article" type="textarea" name="slug" placeholder="The actual article" />
                    
                    {success && <span className="text-green-500 text-sm">Article created successfully</span>}
                    
                    <button className="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
                </form>
           </div>
        </>
    )
}
