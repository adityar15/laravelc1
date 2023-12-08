import React from "react"

export default function FormGroup({
    label,
    name = "",
    type = "text",
    className = "",
    placeholder = "",
    errorMessage = "",
    ...props
}) {
    return (
        <div className={`flex flex-col gap-2 ${className}`}>
            <label className='text-lg font-semibold text-gray-800'>
                {label}
            </label>
            
            {type == "textarea" ?  <textarea name={name} placeholder={placeholder} type={type} className="border border-gray-600 rounded-md p-2" {...props}></textarea> :  
            <input name={name} placeholder={placeholder} type={type} className="border border-gray-600 rounded-md p-2" {...props} />
            }
            
          
            
            
            
            {errorMessage && <span className="text-red-500 text-sm">{errorMessage}</span>}
        </div>
    )
}

