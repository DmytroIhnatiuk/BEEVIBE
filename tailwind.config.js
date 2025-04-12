/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./src/**/*.{html,htm,js}'],
	theme: {
		container: {
			padding: 'var(--container-gap)',
			center: true,
			screens: {
				sm: '100%',
				md: '100%',
				lg: '100%',
				xl: '100%',
			},
		},

		spacing: {
			0: '0',
			2: '.02rem',
			4: '.04rem',
			6: '.06rem',
			8: '.08rem',
			10: '.1rem',
			12: '.12rem',
			14: '.14rem',
			16: '.16rem',
			20: '.2rem',
			24: '.24rem',
			26: '.26rem',
			32: '.32rem',
			36: '.36rem',
			40: '.4rem',
			50: '.5rem',
			100: '1rem',
		},
		borderWidth: {
			DEFAULT: '1px',
		},
		extend: {
			fontSize: {
				s: 'var(--txt-s)',
				m: 'var(--txt-m)',
				l: 'var(--txt-l)',
			},
			lineHeight: {},
			colors: {
				bg: 'var(--bg)',
				white: 'var(--white)',
				black: 'var(--black)',
				orange: 'var(--orange)',
				'light-orange': 'var(--light-orange)',
				khaki: 'var(--khaki)',
				gray: 'var(--gray)',
				red: 'var(--red)',
			},

			borderRadius: {
				DEFAULT: '50%',
				8: '0.08rem',
				20: '0.2rem',
				30: '0.3rem',
			},
		},
	},
	plugins: [
		function ({ addUtilities }) {
			addUtilities({
				'.flex-center': {
					display: 'flex',
					'align-items': 'center',
					'justify-content': 'center',
				},
				'.position-0': {
					position: 'absolute',
					top: '0',
					right: '0',
					bottom: '0',
					left: '0',
				},
				'.-position-1': {
					position: 'absolute',
					top: '-1px',
					right: '-1px',
					bottom: '-1px',
					left: '-1px',
				},
				'.position-center ': {
					position: 'absolute',
					top: '50%',
					left: '50%',
					transform: 'translate(-50%, -50%)',
				},
			})
		},
	],
}
