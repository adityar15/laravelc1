import React, {useState} from 'react'
import {Head, Link} from '@inertiajs/react'
import Pagination from '../components/Pagination'


function BlogCard({blog})
{

    return (
        <Link href={`/blog/${blog?.slug}`} className="flex flex-col gap-4 p-10">
            <h1 className="text-2xl font-semibold">{blog.title}</h1>
            <h2 className="text-lg text-gray-500">{blog?.author?.name}</h2>
        </Link>
    )

}



export default function Blogs({blogs}) {
   
    return (
        <>
            <Head>
                <title>C1 - Blogs page</title>
                <meta name="description" content="This is a sign in page" />
            </Head>
           <div className="max-w-md mx-auto py-10">
            
            <div className="flex flex-col gap-3">
                {blogs?.data?.map(blog => <BlogCard key={blog?.id} blog={blog} /> )}    
            </div>

            <Pagination links={blogs?.links} />
           </div>
        </>
    )
}
