import React from 'react'
import {Link} from "@inertiajs/react"

export default function Pagination({links}) {
  return (
    <div>
        <ul className="flex gap-2">
            {links.map((link, index) => (
            <li key={index}>
                <Link href={link.url} dangerouslySetInnerHTML={{__html:link.label}} className={`py-2 px-4 rounded-md ${link.active ? 'bg-blue-500 text-white' : 'bg-white text-gray-800'}`}>
                </Link>
            </li>
            ))}
        </ul>
    </div>
  )
}
