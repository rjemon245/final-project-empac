import React from 'react'

export function Alert({ type, message }) {
    return (
        <div className={`alert alert-${type} shadow-lg w-max float-right`}>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" className="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                    d={type === 'success' ? "M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" : type === 'info' ? "M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" : type === 'warning' ? "M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" : type === "error" ? "M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" : ''} /></svg>
                <span>{message}</span>
            </div>
        </div>
    )
}

export default function Alerts({ messages }) {

    return (
        <>
            {messages && (<>
                {messages.success.message && <Alert type='success' message={messages.success.message} />}
                {messages.info.message && <Alert type='info' message={messages.info.message} />}
                {messages.warning.message && <Alert type='warning' message={messages.warning.message} />}
                {messages.error.message && <Alert type='error' message={messages.error.message} />}
            </>)

            }

        </>
    )

}

